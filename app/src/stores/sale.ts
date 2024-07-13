import { defineStore } from 'pinia';
import { Product } from 'src/models';
import { ProductSelected } from 'src/models/sale';

export const useSaleStore = defineStore('sale', {
  state: () => ({
    products: [] as Product[],
    productsSelected: [] as ProductSelected[],
  }),
  actions: {
    setProducts(input: Product[]) {
      this.products = input;
    },
    setProductsSelected(input: ProductSelected[]) {
      this.productsSelected = input;
    },
  },
});
