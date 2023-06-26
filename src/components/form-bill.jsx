import { useEffect, useState } from 'react'
import { Formik, Field, Form } from 'formik';


export default function FormBill() {
  const [cart, setCart] = useState(null)
  useEffect(() => {
    const url = ajax_object.ajaxurl
    const data = new FormData()
    data.append('action', 'get_cart_data')

    const getData = async () => {
      const response = await fetch(url, {
        method: 'POST',
        credentials: 'same-origin',
        body: data
      })
      const message = await response.json()
      setCart(message)
    }
    getData()

  }, [])
  return (
    <>
      <h1>Введите ваши данные</h1>
      <Formik
        initialValues={{
          firstName: '',
          lastName: '',
          email: '',
        }}
        onSubmit={async (values) => {
        }}
      >
        <Form>
          <label htmlFor="firstName">First Name</label>
          <Field id="firstName" name="firstName" placeholder="Jane" />

          <label htmlFor="lastName">Last Name</label>
          <Field id="lastName" name="lastName" placeholder="Doe" />

          <label htmlFor="email">Email</label>
          <Field
            id="email"
            name="email"
            placeholder="jane@acme.com"
            type="email"
          />
          <button type="submit">Submit</button>
        </Form>

      </Formik>
    </>
  )
}