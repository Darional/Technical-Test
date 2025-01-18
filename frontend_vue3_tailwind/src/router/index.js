import { createRouter, createWebHistory } from 'vue-router';
import LandingPage from '../components/LandingPage.vue';
import UserProfile from '../components/UserProfile.vue';

const routes = [
  { path: '/', name: 'Landing', component: LandingPage },
  { path: '/profile', name: 'Profile', component: UserProfile }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
