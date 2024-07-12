import Swal from 'sweetalert2';

export const alert = async (
  title: string,
  text: string,
  icon: 'warning' | 'error' | 'success' | 'info' | 'question',
  showDenyButton = true,
  confirmButtonText = 'Ok',
  denyButtonText = 'No'
) => {
  return await Swal.fire({
    title,
    text,
    icon,
    showDenyButton,
    confirmButtonText,
    denyButtonText,
    customClass: {
      confirmButton: 'confirm-button',
      denyButton: 'deny-button',
    },
    buttonsStyling: false,
  });
};
