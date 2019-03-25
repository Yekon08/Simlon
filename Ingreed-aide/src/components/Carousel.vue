<template>
  <div id="slider">
    <figure>
      <img src="../assets/1.jpg" alt="">
      <img src="../assets/2.jpg" alt="">
      <img src="../assets/3.jpg" alt="">
    </figure>
  </div>
</template>

<script>
export default {
  name: "Carousel"
};
</script>

<style lang="scss">
#slider {
  overflow: hidden;
}
@keyframes slider {
  0% { left: 0; }
  30% { left: 0; }
  33% { left: -100%; }
  63% { left: -100%; }
  66% { left: -200%; }
  95% { left: -200%; }
  100% { left: 0; }
}
#slider figure {
  width: 300%;
  position: relative;
  animation: 9s slider infinite; 
}
#slider figure:hover {
/*animation-play-state: paused; enable for pause on hover*/
}
#slider figure img {
  width: 33.333333333%;
  height : 100%;
  float: left;
}
</style>
