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

        <!-- <div class="row py-2 d-flex align-items-center bg-white content-box">
            <input class="col-md-1 d-flex justify-content-center mx-2 p-2 label-checkbox" type="checkbox" id="checkbox" v-model="isCheckedAny" @change="syncCheckAllboxes">
            <div class="col-md-1 img"><img src="" alt="Ảnh bài viết"></div>
            <div class="col-md-4 title">Title</div>
            <div class="col-md-2 create-date">Create At</div>
            <div class="col-md-2 status">Status</div>
            <div class="col-md-1">
                <button @click="goToEdit" type="button" class="btn btn-light" data-mdb-ripple-init data-mdb-ripple-color="dark"><i class='bx bx-pencil' ></i></button>
                <button type="button" class="btn btn-light ms-3" data-mdb-ripple-init data-mdb-ripple-color="dark"><i class='bx bx-trash' ></i></button>
            </div>        
            <ul class="row py-2 d-flex align-items-center bg-white content-box news-list">
                <li class="d-flex align-items-center" v-for="post in posts" :key="post.id">
                    <input class="col-md-1 d-flex justify-content-center mx-2 p-2 label-checkbox" type="checkbox" id="checkbox" v-model="isCheckedAny" @change="syncCheckAllboxes">
                    <div class="col-md-1 img"><img :src="post.image" alt="Ảnh bài viết"></div>
                    <div class="col-md-4 title">{{ post.title }}</div>
                    <div class="col-md-2 create-date">{{ formatDate(post.created_at) }}</div>
                    <div class="col-md-2 status">{{ post.status }}</div>
                    <div class="col-md-1">
                        <button @click="goToEdit" type="button" class="btn btn-light" data-mdb-ripple-init data-mdb-ripple-color="dark"><i class='bx bx-pencil' ></i></button>
                        <button type="button" class="btn btn-light ms-3" data-mdb-ripple-init data-mdb-ripple-color="dark"><i class='bx bx-trash' ></i></button>
                    </div>
                </li>
            </ul>
        </div> -->

        <ul class="news-list">
            <li class="row py-2 d-flex align-items-center bg-white content-box" v-for="post in posts" :key="post.id">
                <input class="col-md-1 d-flex justify-content-center mx-2 p-2 label-checkbox" type="checkbox" id="checkbox" v-model="isCheckedAny" @change="syncCheckAllboxes">
                <div class="col-md-1 img"><img :src="post.image" alt="Ảnh bài viết"></div>
                <div class="col-md-4 title">{{ post.title }}</div>
                <div class="col-md-2 create-date">{{ formatDate(post.created_at) }}</div>
                <div class="col-md-2 status">{{ post.status }}</div>
                <div class="col-md-1 d-flex">
                    <button @click="goToEdit(post.id)" type="button" class="btn btn-light" data-mdb-ripple-init data-mdb-ripple-color="dark"><i class='bx bx-pencil' ></i></button>
                    <button @click="showConfirmDialog(post.id)" type="button" class="btn btn-light ms-3" data-mdb-ripple-init data-mdb-ripple-color="dark"><i class='bx bx-trash' ></i></button>
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
    import axios from 'axios';
    import ConfirmDialog from './ConfirmDialog.vue';
    
    export default {
        components: {
            ConfirmDialog,
        },
        data() {
            return {
                posts: [],
                currentPage: 1,
                totalPages: 1,
                showFilterMenu: false,
                showManageMenu: false,
                isCheckedAll: false,
                isCheckedAny: false,
                total: 0,
                isConfirmDialogVisible: false,
                itemIdToDelete: null
            };
        },
        mounted() {
            this.getPosts();
        },
        methods: {
            async getPosts() {
                try {
                    const response = await axios.get(`https://your-api-url/posts?page=${this.currentPage}&per_page=5`);
                    this.posts = response.data.posts; // Giả sử API trả về một object có key `posts` chứa danh sách bài viết
                    this.totalPages = response.data.meta.total_pages;
                } catch (error) {
                    console.error('Error fetching posts:', error);
                }
                const newItem = {
                    id: 0,
                    img: 0,
                    title: "Title",
                    created_at: "Create At",
                    Status: "Draft"
                }
                this.posts.push(newItem);
            },
            formatDate(dateString) {
                return new Date(dateString).toLocaleDateString('en-US');
            },
            nextPage() {
                if (this.currentPage < this.totalPages) {
                this.currentPage++;
                this.getPosts();
                }
            },
            prevPage() {
                if (this.currentPage > 1) {
                this.currentPage--;
                this.getPosts();
                }
            },
            toggleFilterMenu() {
                this.showFilterMenu = !this.showFilterMenu;
            },
            toggleManageMenu() {
                if (this.total === 0) {
                    this.showManageMenu = false;
                } else {
                    this.showManageMenu = true;
                }
            },
            syncCheckAllboxes() {
                if (this.isCheckedAny) {
                    this.isCheckedAll = true;
                }
                if (!this.isCheckedAny) {
                    this.isCheckedAll = false;
                }
            },
            syncCheckAnyboxes() {
                if (this.isCheckedAll) {
                    this.isCheckedAny = true;
                }
                if (!this.isCheckedAll) {
                    this.isCheckedAny = false;
                }
            },
            goToCreate() {
                this.$router.push('create-news');
            },
            goToEdit(id) {
                this.$router.push(`/edit-news/${id}`);
            }, 
            removeNews(id) {
                this.posts = this.posts.filter(post => post.id !== id);
            },
            showConfirmDialog(id) {
                this.itemIdToDelete = id;
                this.isConfirmDialogVisible = true;
            },
            handleConfirm() {
                this.removeNews(this.itemIdToDelete);
                this.isConfirmDialogVisible = false;
                this.itemIdToDelete = null;
            },
            handleCancel() {
                this.isConfirmDialogVisible = false;
                this.itemIdToDelete = null;
            },
        },
        watch: {
            isChecked2(newVal) {
                this.isChecked1 = newVal ? true : this.isChecked1;
            }
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
  