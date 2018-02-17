/*Find the dates and exchanges where that exchange has more than x trades per minute, while the exchange specific Bitcoin price has been below y.*/
delimiter //
DROP PROCEDURE IF EXISTS ExchangePrices//
CREATE PROCEDURE ExchangePrices(IN tpm VARCHAR(15),price VARCHAR(15))
BEGIN
        IF ((tpm >= 0) and tpm REGEXP '[alpha]'=0 and price >=0 and price REGEXP'[alpha]'=0) THEN
                SELECT Distinct T.Date, T.Exchange as 'Result'
                FROM Trades_Per_Minute as T, Exchange_Price as P, Exchanges E
                WHERE (T.Exchange = P.Exchange and E.Exchange_Name = P.Exchange and
                P.Weighted_avg_price < price and T.Avg_Trades_Per_Minute > tpm);
        ELSE
                SELECT "Error: Invalid tpm or price" AS 'Result';
        END IF;
END//
delimiter ;
