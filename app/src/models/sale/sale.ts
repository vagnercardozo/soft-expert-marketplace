import { ProductSelected } from '.';

export type Sale = {
  id: number;
  value: number;
  created_at?: string | Date;
  updated_at?: string | Date;
};

export type SaleInsert = {
  value: number;
  products: ProductSelected[];
};
