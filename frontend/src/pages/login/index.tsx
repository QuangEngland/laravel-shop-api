import AuthLayout from "@/components/layout/auth-layout";
import { NextPageWithLayout } from "../_app";

const Login: NextPageWithLayout = () => {
  return (
    <div>heheheh</div>
  )
}

Login.getLayout = (page: React.ReactElement) => {
  return (
    <AuthLayout>
      {page}
    </AuthLayout>
  )
}

export default Login;