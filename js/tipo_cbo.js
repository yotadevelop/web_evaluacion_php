new Vue({
    el:"#tipo_cbo",
    data:{
        id_tipo_cristal:"",
        Tipos:[],
        url: "http://localhost:8080/Web-evaluacion-3/",
    },
    methods:{
        cargarTipos: async function(){
            try {
                var recurso="controllers/GetTiposCristal.php"
                const res = await fetch(this.url+recurso);
                const data= await res.json();
                this.Tipos = data;
                console.log(data);
            } catch (error) {
                console.log(error);
            }
        }
    },
    created(){
        this.cargarTipos();
    },
});