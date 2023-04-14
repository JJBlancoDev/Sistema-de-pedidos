import { reactive } from "vue";

export const store = reactive({
    Products: [],
    addProducts(id,cantidad,precio) {
        this.Products.push(
            {
                product_id: id, 
                stockRequired: cantidad,
                pryce: precio
            }
        )
    },
    cleanProducts() {
        this.Products = []
    }
})