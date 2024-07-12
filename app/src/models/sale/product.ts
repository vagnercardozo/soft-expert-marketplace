import { QTableProps } from 'quasar';
import { ProductCategory } from 'src/models';

export type Product = {
  id?: number;
  description: string;
  value: number;
  category_id?: number | ProductCategory;
  product_category?: ProductCategory;
  created_at?: string | Date;
  updated_at?: string | Date;
};

export const columnsProductSale: QTableProps['columns'] = [
  {
    name: 'description',
    label: 'Descrição',
    field: 'description',
    format: (v: string) => v ?? '-',
    align: 'left',
    sortable: true,
  },
  {
    name: 'value',
    label: 'Valor',
    field: 'value',
    format: (v: number) => 'R$ '.concat(String(v)) ?? '-',
    align: 'left',
    sortable: true,
  },
  {
    name: 'product_category',
    label: 'Categoria',
    field: 'product_category',
    format: (v: ProductCategory) => v.description ?? '-',
    align: 'left',
    sortable: true,
  },
];

export const columnsProductSelected: QTableProps['columns'] = [
  {
    name: 'description',
    label: 'Produto',
    field: 'description',
    format: (v: string) => v ?? '-',
    align: 'left',
    sortable: true,
  },
  {
    name: 'product_category',
    label: 'Categoria',
    field: 'product_category',
    format: (v: ProductCategory) => v.description ?? '-',
    align: 'left',
    sortable: true,
  },
  {
    name: 'value',
    label: 'Valor',
    field: 'value',
    align: 'left',
    sortable: true,
  },
  {
    name: 'quantity',
    label: 'Quantidade',
    field: 'quantity',
    format: (v: number) => v ?? 0,
    align: 'left',
    sortable: true,
  },
  {
    name: 'total',
    label: 'Total',
    field: 'total',
    align: 'left',
    sortable: true,
  },
];
