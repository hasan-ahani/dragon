import Dashboard from "./pages/Dashboard";
import UsersList from "./pages/users/UsersList";


export default  [
    {
        path: "/",
        name: "Dashboard",
        component: Dashboard,
        meta: {
            cap: 'level_0'
        }
    },
    {
        path: "*",
        name: "Users",
        component: UsersList,
        meta: {
            cap: 'level_0'
        }
    },
];
