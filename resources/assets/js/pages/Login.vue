<template>
  <main>
    <section class="login">
      <div class="container">
        <div class="row">
          <form class="col-12 col-sm-8 offset-sm-2">
            <div class="row">
              <div class="col-12 form-group">
                <label for="email">Email *</label>
                <input class="text-input" type="email" name="email" v-model="email" placeholder="winner@gupscorner.com">
              </div>
              <div class="col-12 form-group">
                <label for="password">Password *</label>
                <input class="text-input" type="password" name="password" v-model="password" placeholder="Your password">
              </div>
              <div class="form-group col-12">
                <div class="input-group">
                  <button class="button button-submit" :disabled="checkUserFields" @click.prevent="logIn(email, password)">Sign me up!</button>
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
import locStore from 'store'

/* eslint-disable camelcase */
const LOGIN_MUTATION = gql`
  mutation logIn($email: String!, $password: String!) {
    logIn(
      email: $email,
      password: $password
    )
  }
`;
/* eslint-enable */

export default {
  data() {
    return {
      email: "",
      password: ""
    };
  },

  computed: {
    checkUserFields() {
      if (this.email.length > 0 && this.password.length > 0) {
        return false;
      } else {
        return true;
      }
    }
  },

  methods: {
    /* eslint-disable camelcase */
    logIn(email, password) {
      this.$apollo.mutate({
        mutation: LOGIN_MUTATION,
        variables: {
          email: email,
          password: password
        }
      })
      .then(r => {
        locStore.set('token', {token: r.data.logIn})
        this.$router.push('/');
      })
      .catch(error => {
          if (error) {
            console.log(error);
          }
        });
    }
    /* eslint-enable */
  }
};
</script>
