import Vue from "vue";
import Router from "vue-router";
const Terms = () => import("../pages/Terms.vue");
const Login = () => import("../pages/Login.vue");
const SignUp = () => import("../pages/SignUp.vue");
const Dashboard = () => import("../pages/Dashboard.vue");

Vue.use(Router);

export default new Router({
  mode: "history",
  linkActiveClass: "active",
  routes: [
    {
      path: "/login",
      component: Login,
      meta: { auth: false }
    },
    {
      path: "/sign-up",
      component: SignUp,
      meta: { auth: false }
    },
    {
      path: "/terms",
      component: Terms,
      meta: { auth: false }
    },
    {
      path: "/",
      component: Dashboard,
      meta: { auth: true }
    }
  ]
});
