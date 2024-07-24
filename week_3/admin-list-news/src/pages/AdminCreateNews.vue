<template>
    <div class="row">
        <div class="col-md-2 sidebar-component">
            <SideBarComponent />
        </div>
        <div class="col-md-10">
            <div class="row profile-component">
                <ProfileBarComponent />
            </div>
            <div class="row news-create-component">
                <div class="px-5 news-create-box"> 
                    <div class="my-5 news-create-title">
                        <strong>Create News</strong>
                    </div>
                    <EditorComponent />
                </div>
            </div>
        </div>
    </div>
   
</template>

<script>
import { ref } from 'vue';
import SideBarComponent from '@/components/SideBarComponent.vue';
import ProfileBarComponent from '@/components/ProfileBarComponent.vue';
import EditorComponent from '@/components/EditorComponent.vue';

export default {
    name: "AdminCreateNews",
    components: {
        SideBarComponent,
        ProfileBarComponent,
        EditorComponent,
    },
    setup() {
        const posts = ref([]);
        const showAddPostForm = ref(false);

        const addPost = (newPost) => {
        posts.value.push({
            ...newPost,
        });
            showAddPostForm.value = false; // Ẩn form sau khi thêm bài viết
        };

        return {
            posts,
            showAddPostForm,
            addPost,
        };
    },
}
</script>

<style>
.profile-component {
    border: 1px solid #CFCFCF;
}
.news-create-title {
    font-size: 24px;
}
</style>