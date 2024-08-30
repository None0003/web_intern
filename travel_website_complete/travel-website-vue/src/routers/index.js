import { createRouter, createWebHistory } from 'vue-router';
import axios from '../plugins/axios'
import LoginPage from '../pages/LoginPage.vue';
import ForgotPassword from '../pages/ForgotPassword.vue';
import ResetPassword from '../pages/ResetPassword.vue';
import ContactPage from '../pages/ContactPage.vue';
import NewsPage from '../pages/NewsPage.vue';
import ServicePage from '../pages/ServicePage.vue';
import AboutPage from '../pages/AboutPage.vue';
import DiscoverPage from '../pages/DiscoverPage.vue';
import HomePage from '../pages/HomePage.vue';
import NewsDetailsPage from '../pages/NewsDetailsPage.vue';
import AdminListNews from '../pages/AdminListNews.vue';
import AdminCreateNews from '../pages/AdminCreateNews.vue';
import AdminEditNews from '../pages/AdminEditNews.vue';

const routes = [
  {
    path: '/login',
    name: 'LoginPage',
    component: LoginPage,
  },
  {
    path: '/forgot-password',
    name: 'ForgotPassword',
    component: ForgotPassword,
  },
  {
    path: '/reset-password',
    name: 'ResetPassword',
    component: ResetPassword,
  },
  {
    path: '/',
    name: 'HomePage',
    component: HomePage,
  },
  {
    path: '/contact',
    name: 'ContactPage',
    component: ContactPage,
  },
  {
    path: '/news',
    name: 'NewsPage',
    component: NewsPage,
  },
  {
    path: '/news-details',
    name: 'NewsDetailsPage',
    component: NewsDetailsPage,
  },
  {
    path: '/service',
    name: 'ServicePage',
    component: ServicePage,
  },
  {
    path: '/about-us',
    name: 'AboutPage',
    component: AboutPage,
  },
  {
    path: '/discover',
    name: 'DiscoverPage',
    component: DiscoverPage,
  },
  {
    path: '/admin-list-news',
    name: 'AdminListNews',
    component: AdminListNews,
    meta: { requiresAuth: true }
  },
  {
    path: '/create-news',
    name: 'AdminCreateNews',
    component: AdminCreateNews,
    meta: { requiresAuth: true }
  },
  {
    path: '/edit-news/:slug',
    name: 'AdminEditNews',
    component: AdminEditNews,
    meta: { requiresAuth: true }
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach(async (to, from, next) => {
  if (to.meta.requiresAuth) {
      try {
          // Check if user is authenticated
          await axios.get('user');
          next(); // Allow access
      } catch (error) {
          console.log('User not authenticated:', error);
          next('/login'); // Redirect to login page
      }
  } else {
      next(); // Allow access to non-protected routes
  }
});

export default router;
