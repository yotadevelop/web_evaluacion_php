new Vue({
    el: "#app",
    data: {
        rut:"",
        url: "http://localhost:8080/Web-evaluacion-3/",
        cliente: {},
    },
    methods: {
        buscar: async function(){
            const recurso = "controllers/BuscarCliente.php";
            var form = new FormData();
            form.append("rut", this.rut);
            try {
                const res = await fetch(this.url + recurso,{
                    method: "post",
                    body: form,
                });
                const data = await res.json();
                console.log(data);
                if(data == null){
                    M.toast({html: "rut no encontrado"});
                }else{
                    this.cliente = data;
                    
                }
            } catch (error) {
                console.log(error);
            }
        }
    },
    create(){
        
    },
});