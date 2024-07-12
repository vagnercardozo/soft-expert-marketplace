export function useFormatNumber() {
  const formatToBRMoney = (value: number) => {
    const formatedNumber = value.toLocaleString('pt-br', {
      style: 'currency',
      currency: 'BRL',
    });
    return formatedNumber;
  };

  return { formatToBRMoney };
}
