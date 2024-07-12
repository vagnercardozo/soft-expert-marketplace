import { QTableProps } from 'quasar';
import { useDate } from 'src/helpers/dates';
import { ProductCategory } from './product-category';

const { formatDateBR } = useDate();

export type Product = {
  id?: number;
  description: string;
  value: number;
  category_id?: number;
  product_category?: ProductCategory;
  created_at?: string | Date;
  updated_at?: string | Date;
};

export const columnsProduct: QTableProps['columns'] = [
  {
    name: 'id',
    label: 'ID',
    format: (v: string) => v ?? '-',
    field: 'id',
    align: 'left',
    sortable: true,
  },
  {
    name: 'description',
    label: 'Descrição',
    field: 'description',
    format: (v: string) => v ?? '-',
    align: 'left',
    sortable: true,
  },
  {
    name: 'updated_at',
    label: 'Atualizado Em',
    field: 'updated_at',
    format: (val: string) => (val ? formatDateBR(val) : '-'),
    align: 'left',
    sortable: true,
  },
];
