import { RouteRecordRaw } from 'vue-router';

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/IndexPage.vue') },
      {
        path: 'rate',
        name: 'rate',
        component: () => import('pages/rate/RateView.vue'),
      },
      {
        path: 'product-category',
        name: 'product-category',
        component: () =>
          import('pages/product-category/ProductCategoryView.vue'),
      },
      {
        path: 'product',
        name: 'product',
        component: () => import('pages/product/ProductView.vue'),
      },
    ],
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue'),
  },
];

export default routes;
