<template>
    <div class="row">
        <div class="col-md-2 sidebar-component">
            <SideBarComponent />
        </div>
        <div class="col-md-10">
            <div class="row profile-component">
                <ProfileBarComponent />
            </div>
            <div class="row news-management-component">
                <NewsManagementComponent />
            </div>
        </div>
    </div>
   
</template>

<script>
import SideBarComponent from '@/components/SideBarComponent.vue';
import ProfileBarComponent from '@/components/ProfileBarComponent.vue';
import NewsManagementComponent from '@/components/NewsManagementComponent.vue';

export default {
    name: "AdminListNews",
    components: {
        SideBarComponent,
        ProfileBarComponent,
        NewsManagementComponent,
    }
}
</script>

<style>
.profile-component {
    border: 1px solid #CFCFCF;
}
</style>