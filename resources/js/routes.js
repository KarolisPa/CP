const welcome = () => import('./components/welcome.vue')
const EventList = () => import('./components/EventList.vue')
const EventAdd = () => import('./components/EventAdd.vue' )
const EventEdit = () => import('./components/EventEdit.vue')
const OrganizerList = () => import('./components/OrganizerList')
const OrganizerAdd = () => import('./components/OrganizerAdd')
const OrganizerEdit = () => import('./components/OrganizerEdit')

export const routes = [
    {
        name: 'home',
        path: '/',
        component: welcome
    },
    {
        name: 'EventList',
        path: '/events',
        component: EventList
    },
    {
        name: 'EventEdit',
        path: '/event/:id',
        component: EventEdit
    },
    {
        name: 'EventAdd',
        path: '/events/add',
        component: EventAdd
    },
    {
        name: 'OrganizerList',
        path: '/organizers',
        component: OrganizerList
    },
    {
        name: 'OrganizerEdit',
        path: '/organizers/:id',
        component: OrganizerEdit
    },
    {
        name: 'OrganizerAdd',
        path: '/organizers/add',
        component: OrganizerAdd
    }
]
