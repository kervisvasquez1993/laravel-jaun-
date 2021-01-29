<template>
  <div>
    <span class="like-btn" @click="likeReceta" :class="{'like-active' : isActive}"></span>
    <p>
      {{cantidadLike}} Les Gusto esta receta 

    </p>
  </div>

</template>

<script>
export default {
  props : ['recetaId','like','likes'],
  data: function()
  {
    return {
      isActive: this.likes,
      totalLike: this.likes
      }
  },
 /*  mounted() {
    console.log(this.like);
  }, */
  methods: {
    likeReceta()
    {
      axios.post('/recetas/' + this.recetaId)
      .then( respuesta => {
        if(respuesta.data.attached.length > 0) 
        {
          this.$data.totalLike++
        }
        else
        {
          this.$data.totalLike--
        }
        this.isActive = !this.isActive
      })
      .catch( error => {
          if(error.response.status === 401)
          {
            window.location = "/register";
          }
        }
      )
    }

  },

  computed:
  {
    cantidadLike : function()
    {
      return this.totalLike
    }
  }
}
</script>