<template>
   <input 
        type="submit"
        class="btn btn-danger  d-block w-100 mb-2" 
        value="Eliminar X"
        @click="eliminarReceta"
        >
</template>     

<script>
export default {
    props: ['recetaId'],
  
    methods: {
            eliminarReceta()
            {
                    this.$swal({
                            title : '¿Desea Eliminar receta?',
                            text  : 'no te vuelvas loco',
                            icon  : 'warning',
                            showCancelButton: true,
                            configButtonColor : '#d33',
                            configButtonText : 'Si, ELIMINALO',
                    }).then((result) => {
                            if(result.value)
                            {
                                 const params = {
                                    id : this.recetaId
                            }       
                                 // enviar peticion al servidor
                             axios.post(`/recetas/${this.recetaId}`, {params, _method : 'delete'})
                             .then( 
                                 respuesta => this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode)
                             )
                             .catch(error => 
                             {
                                     console.log(error)
                             })
                            }
                            
                            
                            this.$swal({
                                    title : 'receta Eliminada',
                                    text  : 'se elimino la receta',
                                    icon  : 'success'
                            })
                    })
            }
    },

}
</script>