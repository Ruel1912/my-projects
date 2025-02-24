import { patchProfile } from "@/app/database/patch_modals";
import { NextResponse } from "next/server";

export const PUT = async (req) => {
  try {
    const data = await req.json();
    const { profile, error } = await patchProfile(data);
    if (error) throw new Error(error);
    return NextResponse.json({ profile });
  } catch (error) {
    return NextResponse.json({ error: error.message });
  }
};
