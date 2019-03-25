import Vue from "vue";
import Router from "vue-router";
import Home from "./views/Home.vue";
import ÀPropos from "./views/ÀPropos.vue";
import NousAider from "./views/NousAider.vue";
import NosProjets from "./views/NosProjets.vue";
import ProposerUnProjet from "./views/ProposerUnProjet.vue";
import Cours from "./views/Cours.vue";
import LoginMembre from "./views/LoginMembre.vue";
import LoginAdmin from "./views/LoginAdmin.vue";
import EspaceMembre from "./views/EspaceMembre.vue";
import EspaceAdmin from "./views/EspaceAdmin.vue";
import MentionsLégales from "./views/MentionsLégales.vue";

Vue.use(Router);

export default new Router({
  routes: [
    {
      path: "/",
      redirect: "/accueil"
    },
    {
      path: "/accueil",
      name: "Home",
      component: Home
    },
    {
      path: "/à-propos",
      name: "À propos",
      component: ÀPropos
    },
    {
      path: "/nous-aider",
      name: "Nous aider",
      component: NousAider
    },
    {
      path: "/nos-projets",
      name: "Nos projets",
      component: NosProjets
    },
    {
      path: "/proposer-un-projet",
      name: "Proposer un projet",
      component: ProposerUnProjet
    },
    {
      path: "/cours",
      name: "Cours",
      component: Cours
    },
    {
      path: "/login-membre",
      name: "Login membre",
      component: LoginMembre
    },
    {
      path: "/login-admin",
      name: "Formateur",
      component: LoginAdmin
    },
    {
      path: "/espace-membre",
      name: "Apprenant",
      component: EspaceMembre
    },   
    {
      path: "/espace-admin",
      name: "Espace admin",
      component: EspaceAdmin
    },
    {
      path: "/mentions-légales",
      name: "Mentions légales",
      component: MentionsLégales
    }
  ],
  linkActiveClass: "is-active"
});
