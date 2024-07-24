<template>
    <div class="row">
        <div class="col-md-2 sidebar-component">
            <SideBarComponent />
        </div>
        <div class="col-md-10">
            <div class="row profile-component">
                <ProfileBarComponent />
            </div>
            <div class="row news-edit-component">
                <div class="px-5 news-eit-box"> 
                    <div class="my-5 news-edit-title">
                        <strong>Edit News</strong>
                    </div>
                    <EditorComponent />
                </div>
            </div>
        </div>
    </div>
   
</template>

<script>
import SideBarComponent from '@/components/SideBarComponent.vue';
import ProfileBarComponent from '@/components/ProfileBarComponent.vue';
import EditorComponent from '@/components/EditorComponent.vue';

export default {
    name: "AdminCreateNews",
    components: {
        SideBarComponent,
        ProfileBarComponent,
        EditorComponent,
    }
}
</script>

<style>
.profile-component {
    border: 1px solid #CFCFCF;
}
.news-edit-title {
    font-size: 24px;
}
</style>