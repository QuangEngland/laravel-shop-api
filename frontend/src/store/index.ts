import { configureStore } from "@reduxjs/toolkit";
import customers from "@/store/customers";
import bookings from "@/store/bookings";

export const store = configureStore({
    reducer: { 
        customers,
        bookings,
     },
    middleware:  (getDefaultMiddleware) => getDefaultMiddleware({  serializableCheck: false }),
})

export type RootState = ReturnType<typeof store.getState>;
export type AppDispatch = typeof store.dispatch;