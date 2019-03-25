<template>
  <div class="espace-admin">
    <section class="hero is-fullheight is-white">
      <div class="hero-head">         
        <Navigation></Navigation>      
      </div>
      <div class="hero-body is-bold">
        <div class="icon-bar has-text-white-bis">
          <a href="https://www.facebook.com/ecoledescodeurs/" target=_blank  class="facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="https://twitter.com/Simplon08/" target=_blank  class="twitter"><i class="fab fa-twitter"></i></a>  
          <a href="https://github.com/SimplonCharleville/" target=_blank class="github"><i class="fab fa-github"></i></a>
        </div>
        <div class="container" div="title-animation">
          <nav class="level">
            <div class="level-left">     
              <figure class="image">
                <img src="../assets/logo.png" alt="Logo Simplon Charleville">
              </figure>
            </div>             
            <div class="level-right">
              <h1 class="title">
                <span id="title-heading-primary">
                  Espace formateur
                </span>
                <span class="title is-4" id="title-heading-secondary">
                  Formateur Simplon Charleville
                </span>
              </h1>
            </div>               
          </nav>            
        </div>
      </div>
      <section class="section">
        <div class="container">
          <div class="columns has-text-centered">
            <div class="column is-three-fifths is-offset-one-fifth">               
              <div class="box box-shadow has-text-black has-background-info">  
             
              </div>         
            </div>
          </div>
        </div>
      </section>      
      <div class="hero-foot">
        <Footer></Footer>   
      </div>      
    </section>
  </div>
</template>

<script>
import Navigation from "../components/Navigation";
import Footer from "../components/Footer";
export default {
  name: "app",
  components: {
    'Navigation': Navigation,
    'Footer': Footer   
  }
};
</script>

<style lang="scss">
</style>
