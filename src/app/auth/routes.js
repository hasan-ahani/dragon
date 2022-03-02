import Login from "./pages/Login";
import Register from "./pages/Register";
import Forget from "./pages/Forget";
import Confirm from "./pages/Confirm";


export default  [
    {
        path: "/login",
        name: "Login",
        component: Login
    },
    {
        path: "/register",
        name: "Register",
        component: Register
    },
    {
        path: "/complete",
        name: "Complete",
        component: Register
    },
    {
        path: "/forget",
        name: "Forget",
        component: Forget
    },
    {
        path: "/confirm",
        name: "Confirm",
        component: Confirm
    },
];
