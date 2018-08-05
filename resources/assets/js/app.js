/* eslint-disable */
import router from "./router";
import App from "./global/App.vue";

require("./bootstrap");

window.Vue = require("vue");

import { ApolloClient } from "apollo-client";
import { HttpLink } from "apollo-link-http";
import { InMemoryCache } from "apollo-cache-inmemory";
import { setContext } from "apollo-link-context";
import VueApollo from "vue-apollo";
import locStore from "store";

// Register the VueApollo plugin with Vue.
Vue.use(VueApollo);

// Create a new HttpLink to connect to your GraphQL API.
// According to the Apollo docs, this should be an absolute URI.
const httpLink = new HttpLink({
  uri: "http://gups.local/graphql"
});

let link;

if (locStore.get("token")) {
  const token = locStore.get("token");

  // Create a new Middleware Link using setContext
  const middlewareLink = setContext(() => ({
    headers: {
      authorization: `Bearer ${token}`
    }
  }));

  link = middlewareLink.concat(httpLink);
} else {
  link = httpLink;
}

// Create the apollo client
const apolloClient = new ApolloClient({
  // Tells Apollo to use the link chain with the http link we set up.
  link,
  // Handles caching of results and mutations.
  cache: new InMemoryCache(),
  // Useful if you have the Apollo DevTools installed in your browser.
  connectToDevTools: true
});

const apolloProvider = new VueApollo({
  // Apollo 2.0 allows multiple clients to be enabled at once.
  // Here we select the default (and only) client.
  defaultClient: apolloClient
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.auth)) {
    console.log("needs auth");
    if (locStore.get("token")) {
      console.log("authed");
      next();
    } else {
      console.log("not authed");
      next("/login");
    }
  } else {
    console.log("does not need auth");
    next();
  }
});

new Vue({
  // Inject apolloProvider for components to use.
  router,
  provide: apolloProvider.provide(),
  render: h => h(App)
}).$mount("#app");
/* eslint-enable */
