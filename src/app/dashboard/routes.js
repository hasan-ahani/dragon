import Dashboard from "./pages/Dashboard";
import Settings from "./pages/Settings";


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
        path: "/setting/:setting+",
        name: "Settings",
        component: Settings,
        meta: {
            cap: 'level_0'
        }
    },
];
