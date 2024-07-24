import { createRouter, createWebHistory } from 'vue-router';
import AdminListNews from '@/pages/AdminListNews.vue';
import AdminCreateNews from '@/pages/AdminCreateNews.vue';
import AdminEditNews from '@/pages/AdminEditNews.vue';
import MainLayout from '../layouts/MainLayout.vue';

const routes = [
    {
        path: '/',
        component: MainLayout,
        children: [
            {
                path: 'admin-list-news',
                name: 'AdminListNews',
                component: AdminListNews,
                children: [
                    {
                        path: 'create-news',
                        name: 'AdminCreateNews',
                        component: AdminCreateNews,
                    },
                    {
                        path: 'edit-news/:id',
                        name: 'AdminEditNews',
                        component: AdminEditNews,
                    },
                ]
            },
            {
                path: 'create-news',
                name: 'AdminCreateNews',
                component: AdminCreateNews,
            },
            {
                path: 'edit-news/:id',
                name: 'AdminEditNews',
                component: AdminEditNews,
            }
        ]
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
