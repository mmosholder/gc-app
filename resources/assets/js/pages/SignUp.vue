<template>
  <main>
    <section class="login">
      <div class="container">
        <div class="row">
          <form class="col-12 col-sm-8 offset-sm-2">
            <div class="row">
              <div class="col-12">Testing</div>
              <div class="col-12 form-group">
                <label for="name">Name *</label>
                <input class="text-input" type="text" name="name" v-model="newUser.name" placeholder="First Last Name">
              </div>
              <div class="col-12 form-group">
                <label for="username">Username *</label>
                <input class="text-input" type="text" name="username" v-model="newUser.username" placeholder="Your username">
              </div>
              <div class="col-12 form-group">
                <label for="email">Email *</label>
                <input class="text-input" type="email" name="email" v-model="newUser.email" placeholder="winner@gupscorner.com">
              </div>
              <div class="col-12 form-group">
                <label for="password">Password *</label>
                <input class="text-input" type="password" name="password" v-model="newUser.password" placeholder="Your password">
              </div>
              <div class="col-12 form-group">
                <label for="password">Confirm Password *</label>
                <input class="text-input" type="password" name="password" v-model="confirmPassword" placeholder="Confirm your password">
              </div>
              <div class="col-12 form-group">
                <p>Please check here to acknowledge you have read our <router-link to="terms" target="_blank">Terms &amp; Conditions</router-link></p>
                <div class="checkbox-group">
                  <input class="text-input" type="checkbox" id="checkbox" v-model="newUser.terms_agreed_to">
                  <label for="checkbox">I agree to the Terms &amp; Conditions</label>
                </div>
              </div>
              <div class="form-group col-12">
                <div class="input-group">
                  <button class="button button-submit" :disabled="checkUserFields" @click.prevent="signUp(newUser)">Sign me up!</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
import gql from "graphql-tag";
import locStore from "store";

const ALL_USERS_QUERY = gql`
  query {
    users {
      id
      name
    }
  }
`;

/* eslint-disable camelcase */
const SIGNUP_MUTATION = gql`
  mutation signUp($name: String!, $username: String!, $email: String!, $password: String!, $terms_agreed_to: Boolean!) {
    signUp(
      name: $name,
      username: $username,
      email: $email,
      password: $password,
      terms_agreed_to: $terms_agreed_to
    )
  }
`;
/* eslint-enable */

export default {
  data() {
    return {
      newUser: {
        name: "",
        username: "",
        password: "",
        email: "",
        terms_agreed_to: false
      },
      confirmPassword: ""
    };
  },

  computed: {
    checkUserFields() {
      if (this.newUser.name.length > 0 && this.newUser.username.length > 0 && this.newUser.email.length > 0 && this.newUser.terms_agreed_to === true && (this.newUser.password === this.confirmPassword)) {
        return false;
      } else {
        return true;
      }
    }
  },

  methods: {
    /* eslint-disable camelcase */
    signUp(newUser) {
      this.$apollo.mutate({
        mutation: SIGNUP_MUTATION,
        variables: {
          name: newUser.name,
          username: newUser.username,
          email: newUser.email,
          password: newUser.password,
          terms_agreed_to: newUser.terms_agreed_to
        }
      })
      .then(r => {
        locStore.set('token', {token: r.data.signUp})
        this.$router.push('/');
      })
      .catch(error => {
          if (error) {
            console.log(error);
          }
        });
    }
    /* eslint-enable */
  },

  apollo: {
    users: {
      query: ALL_USERS_QUERY
    }
  }
};
</script>
