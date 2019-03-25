<template>
  <div id="app">
    <router-view/>
  </div>
</template>

<style lang="scss">
#app {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  margin: 0;
  padding: 0;
}
.logo img {
  max-width: 75px;
  margin: 25px;
}
/* Fixed/sticky icon bar (vertically aligned 50% from the top of the screen) */
.icon-bar {
  position: fixed;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  right: 0;
  z-index: 1;
}
.icon-bar a {
  display: block;
  text-align: center;
  padding: 10px;
  transition: all 0.3s ease;
  font-size: 16px;
}
.icon-bar a:hover {
  background-color: #e80041;
}
.facebook {
  background: #4267b2;
}
.twitter {
  background: #1da1f2;
}
.github {
  background: #24292e;
}
.hero-body {
  background: #e3e2d5;
}
.level-left .image {
    max-width : 350px;
}
#title-animation {
  position: absolute;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);
}
#title-heading-primary {
  padding: 25px 0 5px 0;
  display: block;
  animation: moveInLeft 1s ease-out;
}
#title-heading-secondary {
  padding: 5px 0 25px 0;
  display: block;
  animation: moveInRight 1s ease-out;
}
@keyframes moveInLeft {
  0% {
    opacity: 0;
    transform: translateX(-100px);
  }
  80% {
    transform: translateX(10px);
  }
  100% {
    opacity: 1;
    transform: translate(0);
  }
}
@keyframes moveInRight {
  0% {
    opacity: 0;
    transform: translateX(100px);
  }
  80% {
    transform: translateX(-10px);
  }
  100% {
    opacity: 1;
    transform: translate(0);
  }
}
</style>
