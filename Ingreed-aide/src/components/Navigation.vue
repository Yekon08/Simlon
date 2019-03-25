<template>
  <header class="header has-background-light">
    <div class="header-container is-fullhd">
      <!-- Main container -->
      <div id="level-header" class="level has-text-black-bis is-uppercase">
        <!-- Left side -->
        <div class="level-left has-text-weight-semibold">
          <div class="level-item">
          <a href="/">
            <img src="../assets/favicon.png" alt="">
          </a>
          </div>        
          <div class="level-item">
            <li><router-link to="/accueil" class="nav-link spacing" class-active="active" exact>Accueil</router-link>
            </li>
          </div>
          <div class="level-item">
            <li><router-link to="/à-propos" class="nav-link spacing" class-active="active" exact>À Propos</router-link>
            </li>
          </div>
          <div class="level-item">
            <li><router-link to="/nous-aider" class="nav-link spacing" class-active="active" exact>Nous Aider</router-link>
            </li>
          </div>
          <div class="level-item">
            <li><router-link to="/nos-projets" class="nav-link spacing" class-active="active" exact>Nos Projets</router-link>
            </li>
          </div>
          <div class="level-item">
            <li><router-link to="/proposer-un-projet" class="nav-link spacing" class-active="active" exact>Proposer un projet</router-link>
            </li>
          </div>
          <div class="level-item">
            <li><router-link to="/cours" class="nav-link spacing" class-active="active" exact>Cours</router-link>
            </li>
          </div>
        </div>
        <!-- Right side -->
        <div class="level-right">
          <div class="level-item">
            <a class="button is-primary has-text-weight-semibold"><router-link to="/login-membre">Apprenant</router-link></a>
          </div>
          <div class="level-item">
            <a class="button is-black has-text-weight-semibold"><router-link to="/login-admin">Formateur</router-link></a>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: "Navigation",
  data() {
    return {
      links: [
        {
          id: 0,
          text: "Accueil",
          page: "/accueil"
        },
        {
          id: 1,
          text: "À Propos",
          page: "/à-propos"
        },
        {
          id: 2,
          text: "Nous Aider",
          page: "/nous-aider"
        },
        {
          id: 3,
          text: "Nos Projets",
          page: "/nos-projets"
        },
        {
          id: 4,
          text: "Proposer un projet",
          page: "/proposer-un-projet"
        },
        {
          id: 5,
          text: "Cours",
          page: "/cours"
        }
      ]
    };
  }
};
</script>

<style lang="scss">
#level-header {
  padding: 25px 50px 25px 25px;
}
.level-item {
  list-style-type: none;
}
.spacing {
  margin: 5px;
}
li:hover {
  color: #e80041; 
}
li:focus {
  background-color: #e80041;   
}
</style>
