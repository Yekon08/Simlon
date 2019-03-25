<template>
  <div class="home">
    <section class="hero is-fullheight is-white has-background-primary">
      <div class="hero-head">
        <Carousel></Carousel>               
        <Navigation></Navigation>
      </div>
      <div class="hero-body has-background-info is-bold">
        <div class="icon-bar has-text-white-bis">
          <a href="https://www.facebook.com/ecoledescodeurs/" target=_blank  class="facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="https://twitter.com/Simplon08/" target=_blank  class="twitter"><i class="fab fa-twitter"></i></a>
          <a href="https://github.com/SimplonCharleville/" target=_blank class="github"><i class="fab fa-github"></i></a>
        </div>
        <div class="tile is-ancestor has-text-centered">
          <div class="tile is-parent">
            <article class="tile is-child box has-background-link">
              <div class="box box-shadow">            
                <br>
                <i class="fas fa-code is-large icon has-text-primary"></i>
                <br>
                <p class="heading has-text-info has-text-weight-bold">Vous souhaitez</p>
                <br>
                <p class="title">Découvrir Simplon ?</p>
                <br>
                <a class="button is-focused is-fullwidth is-primary is-outlined has-text-weight-semibold is-size-6">
                  <router-link to="/à-propos">Visiter</router-link>
                </a>
                <br>
              </div>
            </article>
          </div>
          <div class="tile is-parent">
            <article class="tile is-child box has-background-link">
              <div class="box box-shadow">             
                <br>
                <i class="fas fa-address-card is-large icon has-text-primary"></i>
                <br>
                <p class="heading has-text-info has-text-weight-bold">Vous souhaitez</p>
                <br>
                <p class="title">Venir vous former ?</p>
                <br>
                <a class="button is-focused is-fullwidth is-primary is-outlined has-text-weight-semibold is-size-6">
                  <router-link to="/cours">Visiter</router-link>
                </a>                
                <br>
              </div>              
            </article>
          </div>
          <div class="tile is-parent">
            <article class="tile is-child box has-background-link">
              <div class="box box-shadow">             
                <br>
                <i class="fas fa-sitemap is-large icon has-text-primary"></i>
                <br>
                <p class="heading has-text-info has-text-weight-bold">Vous souhaitez</p>
                <br>
                <p class="title">Proposer un projet ?</p>
                <br>
                <a class="button is-focused is-fullwidth is-primary is-outlined has-text-weight-semibold is-size-6">
                  <router-link to="/proposer-un-projet">Visiter</router-link>
                </a>                
                <br>
              </div>              
            </article>
          </div>
          <div class="tile is-parent">
            <article class="tile is-child box has-background-link">
              <div class="box box-shadow">             
                <br>
                <i class="fas fa-business-time is-large icon has-text-primary"></i>
                <br>
                <p class="heading has-text-info has-text-weight-bold">Vous souhaitez</p>
                <br>
                <p class="title">Engager un stagiaire ?</p>
                <br>
                <a class="button is-focused is-fullwidth is-primary is-outlined has-text-weight-semibold is-size-6">
                  <router-link to="/nous-aider">Visiter</router-link>
                </a>                 
                <br>
              </div>              
            </article>
          </div>
        </div>
      </div>
      <div class="hero-foot">
        <Footer></Footer>
      </div>
    </section>
  </div>
</template>

<script>
import Carousel from "../components/Carousel";
import Navigation from "../components/Navigation";
import Footer from "../components/Footer";
export default {
  name: "app",
  components: {
    'Carousel': Carousel, 
    'Navigation': Navigation,
    'Footer': Footer
  }
};
</script>

<style lang="scss">
.tile.is-child.box {
    margin: 0;
}
</style>
