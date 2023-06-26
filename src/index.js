
const { render } = wp.element
import FormBill from "./components/form-bill";

const Votes = () => {

  return (
    <div>
      <FormBill />
    </div>
  );
};

render(<Votes />, document.getElementById(`checkout_form`));