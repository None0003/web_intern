<template>
    <div class="px-5 news-management-box">
        <router-view></router-view>
        <div class="my-5 news-management-title">
            <strong>News Management</strong>
        </div>
        <div class="management-box">
            <div class="filter-bar d-flex align-items-center mb-3">
                <button @click="toggleFilterMenu" type="button" class="btn btn-light d-flex align-items-center me-3 p-2 filter-button" data-mdb-ripple-init data-mdb-ripple-color="dark"><i class='bx bx-filter me-1 filter-bar-icon'></i>Filters</button>
                <button @click="goToCreate" type="button" class="btn btn-primary btn-rounded d-flex align-items-center p-2" data-mdb-ripple-init><i class='bx bx-plus me-1 filter-bar-icon' ></i>Add News</button>
                <div v-if="showManageMenu" class="d-flex align-items-center p-2 total-checkbox">{{ total }}</div>
                <div class="d-flex justify-content-end ms-auto p-2 search-form">
                    <div class="input-group rounded position-relative">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    </div>
                </div>
            </div>
        </div>
        <div v-if="showFilterMenu" class="filter-menu">
            <div class="bg-white py-2 mb-3 d-flex align-items-center filter-menu-box">
                <div class="ms-3 menu-title">Status: </div>
                <input class="d-flex justify-content-center ms-4 me-2 p-2 filter-checkbox" type="checkbox" id="checkbox">Published
                <input class="d-flex justify-content-center ms-4 me-2 p-2 filter-checkbox" type="checkbox" id="checkbox">Unpublished
                <input class="d-flex justify-content-center ms-4 me-2 p-2 filter-checkbox" type="checkbox" id="checkbox">Is draft
                <div class="ms-5 filter-date">
                    <div>Create At: </div>
                </div>
            </div>
        </div>
        <div v-if="showManageMenu" class="manage-menu">
            <div class="bg-white my-4 d-flex align-items-center menu-box">
                <button type="button" class="btn btn-light d-flex align-items-center mx-2 p-2 text-danger manage-menu-button" data-mdb-ripple-init><i class='bx bx-trash me-1 filter-bar-icon' ></i>Delete</button>
                <button type="button" class="btn btn-light d-flex align-items-center mx-2 p-2 manage-menu-button" data-mdb-ripple-init><i class='bx bx-world me-1 filter-bar-icon' ></i>Published</button>
                <button type="button" class="btn btn-light d-flex align-items-center mx-2 p-2 manage-menu-button" data-mdb-ripple-init><i class='bx bx-lock-alt me-1 filter-bar-icon' ></i>Unpublished</button>
            </div>
        </div>
        <div class="title-box">
            <div class="row py-2 d-flex align-items-center label-bar">
                <input class="col-md-1 d-flex justify-content-center mx-2 p-2 label-checkbox" type="checkbox" id="checkbox" v-model="isCheckedAll" @change="syncCheckAnyboxes">
                <div class="col-md-1 label-1">Image</div>
                <div class="col-md-4 label-2">Title</div>
                <div class="col-md-2 label-3">Create At</div>
                <div class="col-md-2 label-4">Status</div>
            </div>
        </div>

        <ul class="news-list">
            <li class="row py-2 d-flex align-items-center bg-white content-box" v-for="post in posts" :key="post.id">
                <input class="col-md-1 d-flex justify-content-center mx-2 p-2 label-checkbox" type="checkbox" id="checkbox" v-model="isCheckedAny" @change="syncCheckAllboxes">
                <div class="col-md-1 img"><img :src="post.image" alt="Ảnh bài viết"></div>
                <div class="col-md-4 title">{{ post.title }}</div>
                <div class="col-md-2 create-date">{{ formatDate(post.createdDate) }}</div>
                <div class="col-md-2 status">{{ post.status }}</div>
                <div class="col-md-1 d-flex">
                    <button @click="goToEdit(post.slug)" type="button" class="btn btn-light" data-mdb-ripple-init data-mdb-ripple-color="dark"><i class='bx bx-pencil' ></i></button>
                    <button @click="showConfirmDialog(post.slug)" type="button" class="btn btn-light ms-3" data-mdb-ripple-init data-mdb-ripple-color="dark"><i class='bx bx-trash' ></i></button>
                </div>
            </li>
        </ul>

        <ConfirmDialog
        :visible="isConfirmDialogVisible"
        message="Bạn có chắc chắn muốn xóa bài viết này không?"
        @confirm="handleConfirm"
        @cancel="handleCancel"
        />
        
        <nav>
            <div class="row py-2 d-flex align-items-center bg-white footer-bar">
                <div class="col-md-1">
                    <button @click="prevPage" :disabled="currentPage === 1" type="button" class="btn btn-light" data-mdb-ripple-init data-mdb-ripple-color="dark">Previous</button>
                </div>
                <div class="col-md-10 d-flex justify-content-center">
                    <span> Page {{ currentPage }} of {{ totalPages }}</span>
                </div>
                <div class="col-md-1 d-flex justify-content-end">
                    <button @click="nextPage" :disabled="currentPage === totalPages" type="button" class="btn btn-light" data-mdb-ripple-init data-mdb-ripple-color="dark">Next</button>
                </div>
            </div>
        </nav>
    </div>
</template>
  
<script>
    import { ref, onMounted, watch } from 'vue';
    import { useRouter } from 'vue-router';
    import ConfirmDialog from './ConfirmDialog.vue';

    export default {
        components: {
            ConfirmDialog,
        },
        setup() {
            const posts = ref([]);
            const currentPage = ref(1);
            const totalPages = ref(1);
            const showFilterMenu = ref(false);
            const showManageMenu = ref(false);
            const isCheckedAll = ref(false);
            const isCheckedAny = ref(false);
            const total = ref(0);
            const isConfirmDialogVisible = ref(false);
            const itemSlugToDelete = ref(null);
            const router = useRouter();

            const getPosts = async () => {
                // try {
                //     const response = await axios.get(`https://your-api-url/posts?page=${currentPage.value}&per_page=5`);
                //     posts.value = response.data.posts; // Giả sử API trả về một object có key `posts` chứa danh sách bài viết
                //     totalPages.value = response.data.meta.total_pages;
                // } catch (error) {
                //     console.error('Error fetching posts:', error);
                // }


                const newItem = {
                    img: 0,
                    title: "Title",
                    slug: "title-to-slug",
                    createdDate: "",
                    selectedStatus: ["Published", "Draft"],
                    selectedCategory: "Beach",
                    content: "This is what you see"
                };
                posts.value.push(newItem);

                
            };

            const formatDate = (dateString) => {
                return new Date(dateString).toLocaleDateString('en-US');
            };

            const nextPage = () => {
                if (currentPage.value < totalPages.value) {
                    currentPage.value++;
                    getPosts();
                }
            };

            const prevPage = () => {
                if (currentPage.value > 1) {
                    currentPage.value--;
                    getPosts();
                }
            };

            const toggleFilterMenu = () => {
                showFilterMenu.value = !showFilterMenu.value;
            };

            const toggleManageMenu = () => {
                showManageMenu.value = total.value !== 0;
            };

            const syncCheckAllboxes = () => {
                isCheckedAll.value = isCheckedAny.value;
            };

            const syncCheckAnyboxes = () => {
                isCheckedAny.value = isCheckedAll.value;
            };

            const goToCreate = () => {
                router.push('create-news');
            };

            const goToEdit = (slug) => {
                router.push(`/edit-news/${slug}`);
            };

            const removeNews = (slug) => {
                posts.value = posts.value.filter(post => post.slug !== slug);
            };

            const showConfirmDialog = (slug) => {
                itemSlugToDelete.value = slug;
                isConfirmDialogVisible.value = true;
            };

            const handleConfirm = () => {
                removeNews(itemSlugToDelete.value);
                isConfirmDialogVisible.value = false;
                itemSlugToDelete.value = null;
            };

            const handleCancel = () => {
                isConfirmDialogVisible.value = false;
                itemSlugToDelete.value = null;
            };

            onMounted(() => {
                getPosts();
            });

            watch(isCheckedAny, (newVal) => {
                isCheckedAll.value = newVal ? true : isCheckedAll.value;
            });

            return {
                posts,
                currentPage,
                totalPages,
                showFilterMenu,
                showManageMenu,
                isCheckedAll,
                isCheckedAny,
                total,
                isConfirmDialogVisible,
                itemSlugToDelete,
                getPosts,
                formatDate,
                nextPage,
                prevPage,
                toggleFilterMenu,
                toggleManageMenu,
                syncCheckAllboxes,
                syncCheckAnyboxes,
                goToCreate,
                goToEdit,
                removeNews,
                showConfirmDialog,
                handleConfirm,
                handleCancel
            };
        }
    };
</script>

  
<style scoped>
    .news-management-title {
        font-size: 24px;
    }
    .filter-button {
        border: 1px solid #D0D5DD;
    }
    .filter-bar-icon {
        font-size: 20px;
    }
    .menu-box {
        border-radius: 8px;
    }
    .manage-menu-button {
        background-color: white;
        border: none;
    }
    .filter-menu-box {
        border-radius: 8px;
    }
    .filter-menu-checkbox {
        color: #000AFF
    }
    .filter-menu-button {
        background-color: white;
        border: none;
    }
    .search-form {
        width: 20vw;
    }
    .label-bar {
        border: 1px solid #EAECF0;
        border-radius: 8px 8px 0px 0px;
        background-color: #F9FAFB;
        color: #8A92A6;
    }
    .content-box {
        border: 1px solid #EAECF0;
    }
    .news-list {
        padding: 0;
        margin: 0;
    }
    .footer-bar {
        border: 1px solid #EAECF0;
        border-radius: 0px 0px 8px 8px;
    }
</style>
  