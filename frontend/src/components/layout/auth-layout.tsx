import React from 'react'
import { NextPage } from 'next';
import { ReactNode } from 'react';
const AuthLayout: NextPage<{ children: ReactNode }> = ({ children }) => {
  return (
    <main>
        auth layout
        {children}
    </main>
  )
}

export default AuthLayout;