function interpolate(paquet_size,speed,frequency,target_BLER)

    fid = fopen('Output.txt', 'w'); % Open the file
    N = 10; % the degree of the polynomial 
    SINR = -10:1:15; % SINR simulation values in dB
    
    if(frequency == 2) % frequency = 2 GHz
        if(paquet_size == 190) % paquet_size = 190 BYTE
            if(speed == 30) % speed = 30 Km/h
                BLER = [0.9999 0.9987 0.9977 0.9333 0.9825 0.9567 0.9213 0.8574 0.7739 0.6744 0.5485 0.4326 0.3231 0.2286 0.1505 0.0990 0.0617 0.0374 0.0217 0.0137 0.0078 0.0036 0.024 0.0009 0.0004 0.0000];
            end
            if(speed == 120) % speed = 120 Km/h
                BLER = [1.0000 0.9995 0.9984 0.9954 0.9841 0.9633 0.9283 0.8668 0.7839 0.6762 0.5557 0.4354 0.3171 0.2232 0.1536 0.0935 0.0579 0.0333 0.0173 0.0085 0.0049 0.0028 0.0014 0.0007 0.0004 0.0000];
            end
        end
        if(paquet_size == 300) % paquet_size = 300 BYTE
            if(speed == 30) % speed = 30 Km/h
                BLER = [1.0000 0.9996 0.9984 0.9962 0.9880 0.9731 0.9445 0.8946 0.8153 0.7200 0.6030 0.4701 0.3363 0.2371 0.1435 0.0864 0.0479 0.0227 0.0117 0.0056 0.0023 0.0005 0.0003 0.0000 0.0001 0.0000];
            end
            if(speed == 120) % speed = 120 Km/h
                BLER = [1.0000 0.9998 0.9995 0.9972 0.9918 0.9808 0.9529 0.9047 0.8304 0.7297 0.6027 0.4688 0.3336 0.2270 0.1374 0.0788 0.0404 0.0178 0.0079 0.0027 0.0009 0.0004 0.0003 0.0000 0.0000 0.0000];
            end
        end
    end
    
    if(frequency == 5.9) % frequency = 5.9 GHz
        if(paquet_size == 190) % paquet_size = 190 BYTE
            if(speed == 30) % speed = 30 Km/h
                BLER = [0.9999 0.9993 0.9983 0.9942 0.9851 0.9640 0.9247 0.8671 0.7927 0.6657 0.5485 0.4256 0.3219 0.2295 0.1459 0.1078 0.0661 0.0431 0.0245 0.0138 0.0088 0.0048 0.0017 0.0013 0.0008 0.0007];
            end
            if(speed == 120) % speed = 120 Km/h
                BLER = [1.0000 0.9999 0.9991 0.9981 0.9931 0.9822 0.9481 0.8991 0.8201 0.7108 0.5756 0.4417 0.3138 0.2018 0.1172 0.0669 0.0321 0.0143 0.0083 0.0028 0.0007 0.0002 0.0000 0.0000 0.0000 0.0000];
            end
        end
        if(paquet_size == 300) % paquet_size = 300 BYTE
            if(speed == 30) % speed = 30 Km/h
                BLER = [1.0000 0.9997 0.9992 0.9974 0.9900 0.9759 0.9483 0.8969 0.8211 0.7160 0.5888 0.4602 0.3317 0.2262 0.1336 0.0793 0.0435 0.0221 0.0092 0.0039 0.0011 0.0003 0.0000 0.0000 0.0000 0.0000];
            end
            if(speed == 120) % speed = 120 Km/h
                BLER = [1.0000 1.0000 0.9997 0.9991 0.9968 0.9882 0.9705 0.9302 0.8657 0.7652 0.6233 0.4805 0.3313 0.2038 0.1101 0.0549 0.0211 0.0064 0.0021 0.0006 0.0001 0.0001 0.0000 0.0000 0.0000 0.0000];
            end
        end
    end
    
    p = polyfit(BLER, SINR,N); % p contains the coefficients of the polynomial
    
    x = target_BLER; % input BLER

    y = 0;
    
    for n = 1:N+1 % construction of the polynomial
        y = y + p(n) * x^(N+1-n);
    end
    
    fprintf(fid,'%f', y); % Write SINR output to file
    
    fclose(fid); % Close file

    quit force % Quit MATLAB
    
end 
    
    
    