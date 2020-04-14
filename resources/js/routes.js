import VueRouter from 'vue-router'
import Home from './components/views/Home'
import Users from './components/users/Index'
import Works from './components/works/Index'
import Images from './components/images/Index'
import Comments from './components/comments/Index'
export default new VueRouter ({
    routes: [
        {
            path: '/dashboard/home',
            component: Home
        },
        {
            path: '/dashboard/users',
            component: Users,
            name: 'Users',

        },
        {
            path: '/dashboard/works',
            component: Works,
            name: 'Works',

        },
        {
            path: '/dashboard/images',
            component: Images,
            name: 'Images',

        },
        {
            path: '/dashboard/comments',
            component: Comments,
            name: 'Comments',
        }
    ],
    mode: 'history',
})