import { QTableProps } from 'quasar';
import { ProductSelected } from '.';
import { useDate } from 'src/helpers/dates';
import { useFormatNumber } from 'src/helpers/currency/format-number';

const { formatDateBR } = useDate();
const { formatToBRMoney } = useFormatNumber();

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

export const columnsSale: QTableProps['columns'] = [
  {
    name: 'id',
    label: 'ID',
    format: (v: string) => v ?? '-',
    field: 'id',
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
    name: 'updated_at',
    label: 'Atualizado Em',
    field: 'updated_at',
    format: (val: string) => (val ? formatDateBR(val) : '-'),
    align: 'left',
    sortable: true,
  },
];
