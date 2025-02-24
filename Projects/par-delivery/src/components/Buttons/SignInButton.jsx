"use client";
import { signIn, getCsrfToken, getProviders } from "next-auth/react";
import Image from "next/image";
import styles from "./SignIn.module.css";
import { useSearchParams } from "next/navigation";

export const SignInButton = (props) => {
  const searchParams = useSearchParams();
  const callbackUrl = searchParams.get('callbackUrl') || "/main";
  return(
    <button
      className={styles.socialButton}
      onClick={() => signIn(props.signIn, { callbackUrl })}
    >
      <Image width='24' height={24} src={props.src} alt={props.alt} />
    </button>)
};
