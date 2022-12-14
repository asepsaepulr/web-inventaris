import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '@store/store.js'

function isLoggedIn (to, from, next) {
    if (store.state.auth.loggedIn) {
        next('/')
        return false
    } else {
        next()
    }
}

function requireAuth (to, from, next) {
    if (!store.state.auth.loggedIn) {
        next('/')
        return false
    } else {
        next()
    }
}

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'HomePage',
            component: () => import('@pages/HomePage.vue'),
            meta: {
                title: 'UlasBuku'
            }
        },
        {
            path: '/book/:slug',
            name: 'DetailBookPage',
            component: () => import('@pages/DetailBookPage.vue'),
            meta: {
                title: 'Rindu Tere Liye - UlasBuku'
            }
        },
        {
            path: '/search',
            name: 'ListBookPage',
            component: () => import('@pages/ListBookPage.vue'),
            meta: {
                title: 'Hasil Pencarian - UlasBuku'
            }
        },
        {
            path: '/about',
            name: 'AboutPage',
            component: () => import('@pages/AboutPage.vue'),
            meta: {
                title: 'Tentang - UlasBuku'
            }
        },
        {
            path: '/category',
            name: 'CategoryPage',
            component: () => import('@pages/CategoryPage.vue'),
            meta: {
                title: 'Kategori - UlasBuku'
            }
        },
        {
            path: '/profile',
            name: 'ProfilePage',
            component: () => import('@pages/ProfilePage.vue'),
            meta: {
                title: 'Profil - UlasBuku'
            },
            beforeEnter: requireAuth
        },
        {
            path: '/login',
            name: 'LoginPage',
            component: () => import('@pages/auth/LoginPage.vue'),
            meta: {
                title: 'Masuk - UlasBuku',
                layout: 'BasicLayout'
            },
            beforeEnter: isLoggedIn
        },
        {
            path: '/register',
            name: 'RegisterPage',
            component: () => import('@pages/auth/RegisterPage.vue'),
            meta: {
                title: 'Daftar Akun - UlasBuku',
                layout: 'BasicLayout'
            }
        },
        {
            path: '/forget-password',
            name: 'ForgotPasswordPage',
            component: () => import('@pages/auth/ForgotPassword.vue'),
            meta: {
                title: 'Lupa Password - UlasBuku',
                layout: 'BasicLayout'
            }
        },
        {
            path: '/reset-password',
            name: 'ResetPasswordPage',
            component: () => import('@pages/auth/ResetPassword.vue'),
            meta: {
                title: 'Reset Password - UlasBuku',
                layout: 'BasicLayout'
            }
        },
        {
            path: '*',
            name: 'NotFoundPage',
            component: () => import('@pages/404.vue'),
            meta: {
                title: 'Halaman Tidak Ditemukan - UlasBuku',
                layout: 'BasicLayout'
            }
        }
    ],
    scrollBehavior (to, from) {
        if (to.name === from.name) {
            return false
        } else {
            return { x: 0, y: 0 }
        }
    }
})

router.afterEach((to, from) => {
    Vue.nextTick(() => {
        document.title = to.meta.title
    })
})

export default router
