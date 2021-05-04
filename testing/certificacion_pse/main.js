
const fieldValue = (fieldName) => document.getElementById(fieldName).value


const openCheckout = function (publicKey, testing, external) {

    let test = testing === 'true' ? true : false;
    const handler = ePayco.checkout.configure({
        key:  fieldValue("llaves") ? fieldValue("llaves") : publicKey ,
        test
    })

    let data = {
        //Datos de la compra
        name: fieldValue("nombre") ? fieldValue("nombre") : "Pago PSE Certificacion " + new Date().getTime(),
        description: fieldValue("descripcion") ? fieldValue("descripcion") : "Pago PSE Certificacion",
        invoice: fieldValue("factura") ? fieldValue("factura") : "FACTURA PSE: " + new Date().getTime(),   
        amount: fieldValue("monto") ? fieldValue("monto") : 5000,
        tax: fieldValue("tax") ? fieldValue("tax") :0,
        tax_base: fieldValue("tax_base") ? fieldValue("tax_base") :0,
        tax_ico: fieldValue("tax_ico") ? fieldValue("tax_ico") :0,
        
        //Configuracion
        lang: "es",
        country: "co",
        external: external,
        response: "https://epayco.co",
        confirmation: "https://epayco.co",
        currency: document.getElementById("dolares").checked ? "usd" :"cop",


        //Atributos cliente
        name_billing: "John Doe",
        address_billing: "Carrera 19 numero 14 91",
        type_doc_billing: "cc",
        mobilephone_billing: "3050000000",
        number_doc_billing: "100000000"
    }
    console.log(data);
    
    handler.open(data)
}