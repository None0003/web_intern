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
                <CreateNewsComponent />
            </div>
        </div>
    </div>
   
</template>

<script>
import SideBarComponent from '@/components/SideBarComponent.vue';
import ProfileBarComponent from '@/components/ProfileBarComponent.vue';
import CreateNewsComponent from '@/components/CreateNewsComponent.vue';

export default {
    name: "AdminCreateNews",
    components: {
        SideBarComponent,
        ProfileBarComponent,
        CreateNewsComponent,
    }
}
</script>

<style>
.profile-component {
    border: 1px solid #CFCFCF;
}
</style>