new Vue({
    el: "#CBO",
    data:{
        id_material_cristal :"",
        materiales: [],
        url: "http://localhost:8080/Web-evaluacion-3/",
    },
    methods:{
        cargarMateriales: async function(){
            try {
                var recurso="controllers/GetMaterialesCristal.php"
                const res = await fetch(this.url+recurso);
                const data= await res.json();
                this.materiales = data;
                console.log(data);
            } catch (error) {
                console.log(error);
            }
        }
    },
    created(){
        this.cargarMateriales();
    },
});