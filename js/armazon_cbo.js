new Vue({
    el:"#arma_cbo",
    data:{
        id_armazon:"",
        armazones:[],
        url: "http://localhost:8080/Web-evaluacion-3/",
    },
    methods:{
        cargaArmazon: async function(){
            try {
                var recurso = "controllers/GetArmazon.php";
                const res = await fetch(this.url+recurso);
                const data= await res.json();
                this.armazones = data;
                console.log(data);
            } catch (error) {
                console.log(error);
            }
        }
    },
    created(){
        this.cargaArmazon();
    },
});