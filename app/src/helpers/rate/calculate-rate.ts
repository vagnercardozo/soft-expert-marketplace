import { Rate } from 'src/models';

export const calculateRate = (valueTotal: number, rates: Rate[]) => {
  const rateTotal = rates.reduce(
    (previousValue, currentValue) => previousValue + Number(currentValue.value),
    0
  );
  return valueTotal * (rateTotal / 100);
};
