import { QTableProps } from 'quasar';
import { useFormatNumber } from 'src/helpers/currency/format-number';
import { ProductCategory } from 'src/models';

const { formatToBRMoney } = useFormatNumber();

export type Product = {
  id?: number;
  description: string;
  value: number;
  category_id?: number | ProductCategory;
  product_category?: ProductCategory;
  created_at?: string | Date;
  updated_at?: string | Date;
};

export type ProductSelected = {
  id: number;
  description: string;
  value: number;
  quantity: number;
  rate?: number;
  product_category: ProductCategory;
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
    format: (v: number) => formatToBRMoney(Number(v)),
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
    name: 'rate',
    label: 'Taxa R$',
    field: 'rate',
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
  {
    name: 'actions',
    label: 'Ações',
    field: 'actions',
    align: 'center',
    sortable: true,
  },
];
