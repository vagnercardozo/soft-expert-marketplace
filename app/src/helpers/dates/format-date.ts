type FormatDateBR = (input: string) => string;

export function useDate() {
  const formatDateBR: FormatDateBR = (fDate) => {
    const formatedDate = fDate.substring(0, 10).split('-').reverse().join('/');
    return formatedDate;
  };
  return {
    formatDateBR,
  };
}
