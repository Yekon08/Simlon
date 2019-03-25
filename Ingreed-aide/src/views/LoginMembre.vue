<template>
  <div class="login-membre">
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
                  Espace apprenant
                </span>
                <span class="title is-4" id="title-heading-secondary">
                  Apprenant Simplon Charleville
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
                <div class="field">
                <p class="control has-icons-left has-icons-right">
                  <input class="input" type="email" placeholder="Email">
                  <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                  <span class="icon is-small is-right"><i class="fas fa-check"></i></span>
                </p>
                </div>
                <div class="field">
                <p class="control has-icons-left">
                  <input class="input" type="password" placeholder="Mot de passe">
                  <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                </p>
                </div>
                <div class="field">
                <p class="control">
                  <button class="button is-primary has-text-weight-semibold is-uppercase">Login</button>
                </p>
                </div>                
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
